# Challenge

**Name:** Flag 3: Insecure Password Manager

**Category:** Architecture and Networking

**Difficulty:** Medium

**Description:**

Well... maybe we shouldn't just leave our credentials lying around on our filesystem...

That is why David has been developing a new web based password manager! However, it is currently in development so it can only be reached locally on the server on port 1337 (`http://127.0.0.1:1337/`). For more information about how to use the beta password manager you should check David's note at `/home/alex/note_to_alex.txt`.

Can you access the password manager and retrieve the password for the user `alex`?

The flag is in the file called **flag3.txt** in `/home/alex`.

**Flag:** CITS1003{b3tt3r_u5e_4_pR00pR_p455_m4naGr!!121!}

## Solution

* Use curl

```
curl -X POST -d 'password=imjustgonnawhackmykeyboardforabitR3DSAV76ydwsqa8hb7HD' http://127.0.0.1:1337
```

* Gets the following credentials alex:thispasswordissuperdupersecuresinceitisextremelylong
