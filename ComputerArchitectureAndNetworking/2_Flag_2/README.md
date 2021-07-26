# Challenge

**Name:** Flag 2: Finding the Hidden Creds

**Category:** Architecture and Networking

**Difficulty:** Medium

**Description:**

Wow you found the SSH port! Can you find anything else that you can use to compromise the user **jeff**? Alex left a note in `/home/jeff/read_me_jeff.txt` that said that he has hidden Jeff's new password in a file called `jeffs_creds.txt`. If you can find Jeff's new password, login as him to get your next flag!

**Flag:** CITS1003{pR0b5_5h0uLdNt_l34Ve_cR3Ds_lY1Ng_aRoUnd}

## Solution

* `find / -name jeffs_creds.txt 2>/dev/null` finds the location of the hidden credentials.

* It will take forever looking for them manually.
