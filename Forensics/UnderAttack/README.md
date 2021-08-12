# Under Attack
## Task 1: Who Is That?

**Difficulty:** Easy

Help our Windows server is under attack! Well we think we are but not 100% sure...

The reason why we think that we are being attacked is because we noticed thousands of network packets being sent to and from our server. Can you analyse our network packet dump and find if we have been compromised?

The first task that you will need to do is identify the IP address of the suspicious user. To support the claim that the IP address is being used for a malicious purpose, use [AbuseIPDB](https://www.abuseipdb.com/) to retrieve the **country** and the **VPN company** that was used. The flag will be in the format below in all lower case and no spaces:

**`<COUNTRY>:<VPN COMPANY>:<IP ADDRESS>`**

For an example:

**`australia:nordvpn:120.123.69.5`**

You will need to install a powerful tool called **wireshark** to analyse the packets that were captured on the Windows server. You can download wireshark from [here](https://www.wireshark.org/download.html).

Once installed, import the file `captured.pcapng` and look at the statistics for the IP addresses that were captured (tab on the top bar). The *suspicious* user has the highest count of packets being captured (excluding 10.0.0.4 which is the targeted Windows server).

Here are also some resources that you can use to learn how to use Wireshark, but these questions will be fairly guided.

* Youtube Video by Anson Alexander: https://www.youtube.com/watch?v=TkCSr30UojM
* Display Filters to Limit Output: https://wiki.wireshark.org/DisplayFilters

**Answer**

The statistics show that there are over 75000+ packets that are associated with the IP address **5.8.16.237**. Checking on AbuseIPDB, we can see that the IP address points to a location in **Russia**, along with the WHOIS record we can see that the IP address has a hostname of **ru-03.protonvpn.com** implying that **Proton VPN** was the VPN company that was used.

Therefore, the flag is:

`russia:protonvpn:5.8.16.237`

---

## Task 2: Found Your Website

**Difficulty:** Easy

Once you have identified the malicious actor, you can filter the traffic by using the display filter `ip.addr == <IP address>` (eg. `ip.addr == 120.123.69.5`).

You can see in the filtered packet capture that they first used a *port scanner* then a *web fuzzer* to scan the server. A *web fuzzer* is a tool that brute forces a tonne of requests to a website to establish a map of valid URL paths on the website and *potentially find vulnerable sections*.

For this task, it looks like the adversary found a URL path to a *damn vulnerable web application*.

**What was the URL folder that the hacker found and visited?**

For an example, if the vulnerable website was hosted on `http://cybernemosyne.xyz/vulnerable/index.php` then your answer would just be `/vulnerable`.

**Hint**

Remember that the malicious actor used both a port scanner and a web fuzzer that results in a **tonne of packets** and is very noisy. It would be faster to search from the latest packets first rather than oldest. You can sort the packets in reverse using the time column.

Also since we are looking for a web URL path that the adversary visited it would help to filter only the web traffic with the `http` display filter. You can combine the two filters using the following display filter:

`ip.addr == <IP address> && http`

**Answer**

You can filter for the web traffic with the malicious actor using the following filter:

`ip.addr == 5.8.16.237 && http`

Reversing the order shows that the malicious actor started visting pages with the URL path `/secure/<stuff here>`. Therefore the answer is:

`/secure`

---

## Task 3: Such Bad Creds Wow

**Difficulty:** Medium

Further analysing the network packets, it appears that the adversary sent a few POST requests to a page called `login.php`. This means that the the hacker tried a few login attempts before successfully logging in.

**What were the username and password that the adversary used to login?**

You answer needs to be in the format `<username>:<password>`. For an example for the username `david` and the password `12345` your answer would be `david:12345`.

**Answer**

In the POST requests sent to `/secure/login.php`, we can see that the successfully login had the following credentials.

`admin:password`

This challenge can also be solved by identifying that the website is DVWA and the default credentials are `admin:password`.

---

## Task 4: That File Does Not Look Safe

**Difficulty:** Medium

The malicious actor was able to upload a malicious **PHP** to the website and use a Local File Inclusion vulnerability to execute that file.

**What was the name of the PHP file that the hacker uploaded?**

**Answer**

Seeing the requests to `/secure/vulnerabilities/fi/?page=../../hackable/uploads/webshell.php` it can be easily deduced that the file that was uploaded was called **`webshell.php`**.

---

## Task 5: That File Looks Even Worst

**Difficulty:** Hard

It is speculated that the webshell was used to upload and execute some malware onto the Windows server, that can be revealed by analysing the POST requests that were sent.

**What was the name of the exe that was uploaded onto the server?**

Your answer should be in the format of `something.exe`. It isn't `malware.exe` that is used in the following task.

**Answer**

Analysing the data of the POST requests you can see the malware filename in two key ways.

The first when the malware is uploaded the file name can be seen.

```
Content-Disposition: form-data; name="upload"; filename="hickityhackityOWO.exe"
Content-Type: application/x-ms-dos-executable
```

The second way is by finding the POST request that executed the malware that reveals the malware name as well.

`C:\xampp\htdocs\secure\vulnerabilities\fi\hickityhackityOWO.exe`

The answer is therefore **hickityhackityOWO.exe**.

---

## Task 6: What Made It

**Difficulty:** Hard

**IMPORTANT!**
This task requires working with actual malware so please be careful handling the file `malware.exe`.

A copy of the malware that was uploaded to the server has been provided in the downloaded zip file.

**Try and figure out the hacking tool/framework that the adversary used to generate the malware.**

You might find sites like **VirusTotal** helpful with your malware analysis.

**Answer**

Uploading to VirusTotal shows that most antivirus software identifies the malware being made by **metasploit**.

However if students submit **msfvenom** as the answer then it will be marked as correct as well (`msfvenom` is a tool that comes with the metasploit framework for generating payloads).

---

## Task 7: This Server Is In A Bind

**Difficulty:** Hard

It turns out that that malware the hacker uploaded was a **bind shell**. Bind shells open a port on a victims computer that allows the attacker to directly connect to and start executing terminal commands on.

Your next task is to figure out the the **port** that was opened by the malware that the hacker connected to start executing commands.

**Answer**

Removing the `http` filter shows that after the hacker uploaded and executed the malware, a new connection can be seen being established by the hacker to port `42069`.

---

## Task 8: Whoami

**Difficulty:** Hard

Using the port number that you found in Task 7, it will help to filter for just communications on that specific port using the display filter `tcp.port == <port number>` (eg. `tcp.port == 80`). It is common to see hackers running the `whoami` command on machines once they can start executing commands on the Windows machine.

Analysing the TCP packets of the bind shell, **what is the name of the user on the Windows server that the adversary compromised?**

For an example `cits1003-computer\david`.

**Answer**

Viewing the data sent on TCP connections on port 42069 (can be filtered using the expression `ip.addr == 5.8.16.237 && tcp.port == 42069`) we can see that when the hacker executed the `whoami` command it revealed that they compromised the **`nt authority\system`** user.

Both Task 8 and 9 can be solved by clicking on the Follow TCP stream of the connection to port 42069.

---

## Task 9: A Present From The Hacker

**Difficulty:** Hard

Finally it looked like the hacker left a message on the Windows Server.

**What was the message that the hacker left on the server and file that they saved that message to?**

Your answer needs to be in the format of `<MESSAGE>:<FILE>` for an example `HACK THE PLANET:C:\message.txt`.

**Answer**

Further looking at the commands that the hacker executed, we can see that they executed the command `echo "YA JUST GOT PWNED LOOOOL!" > C:\getrektd.txt`. Therefore the answer is

`YA JUST GOT PWNED LOOOOL!:C:\getrektd.txt`
