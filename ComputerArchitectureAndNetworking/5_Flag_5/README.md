# Challenge

**Name:** Flag 5: Hack the Planet

**Category:** Architecture and Networking

**Difficulty:** Hard

**Description:**

That is amazing that you were able to hack all of those accounts to reach David's account! We are actually extremely worried that you were able to get so far, especially since **david can run commands as the root user**. You can see what commands he can run using the command `sudo -l`, but we have recently clamped down on security and only allowed David to use the **text editor called vim** with `sudo`.

Can you use `vim` to hack the entire server? You might find something useful from [GTFOBins](https://gtfobins.github.io/)!

The flag is in a file in the `/root` folder.

**Flag:** CITS1003{y0u_jVsT_g0t_h4cK3d_bY_a_t3Xt_eD1tOr!11!!11!}

## Solution

* You can run shell commands from inside of `vim`

* Example start vim using `sudo vim` then type `:!sh` to start a shell as the root user
