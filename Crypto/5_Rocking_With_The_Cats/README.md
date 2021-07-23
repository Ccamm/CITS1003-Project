# Challenge

**Name:** Rocking With The Cats

**Category:** Cryptography

**Difficulty:** Hard

**Description:**

Man some of these cats go absolutely wild! Last Saturday, I went to a house party where I saw some feral feline screaming out their password hash to the tune of *We Will Rock You* by Queen. I tried telling them that it is a pretty dumb idea to leak their hashed password to everyone, but they insisted it was fine since their password was *32 characters long* and it cannot be brute forced.

Can you teach this feline fleabag a lesson and crack their password?

**Challenge Files:** hex_cipher.txt

**Flag:** qwertyuiopasdfghjklqwertyuiopasd

## Solution

* Using the hint `We Will Rock You by Queen`, assume that the password is in the RockYou password breach https://github.com/praetorian-inc/Hob0Rules/blob/master/wordlists/rockyou.txt.gz

* Filter for only passwords that are 32 characters long from the password wordlist, since the cat said their password is 32 characters long.

```
awk 'length($0) == 32' /usr/share/wordlists/rockyou.txt > rockyou32.txt
```

* Crack using Hashcat or John the Ripper (doesn't really matter which one)

```bash
john -w=rockyou32.txt cat.hash
```

```bash
hashcat -a 0 -m 3200 cat.hash rockyou32.txt
