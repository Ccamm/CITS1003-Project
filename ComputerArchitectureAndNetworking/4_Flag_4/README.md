# Challenge

**Name:** Flag 4: Pubkey Shenanigans

**Category:** Architecture and Networking

**Difficulty:** Medium

**Description:**

Okay this is really bad, we believed that our password manager was secure so we put the credentials `alex` on the site. Now you have hacked into Alex's account and you can **steal David's private RSA key and use it to SSH into the server!** This is really really bad...

Can you SSH into David's account and retrieve the next flag?

The flag is in the file called **flag4.txt** in `/home/david`.

**Flag:** CITS1003{3P0053D_55H_K3Y!!!!!_0H_N03S!!1one!}

## Solution

* David's SSH key is located at `/home/alex/topsecret/david_id_rsa`.

* You can either copy it to your own machine or use it locally.

```
ssh -i /home/alex/topsecret/david_id_rsa -p 2022 david@localhost
```
