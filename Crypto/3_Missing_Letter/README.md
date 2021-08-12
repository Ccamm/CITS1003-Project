# Challenge

**Name:** Missing Letter

**Category:** Cryptography

**Difficulty:** Medium

**Description:**

Help I have forgotten the end of my encryption key and I cannot decrypt my data!

I know I used **AES-128** using **CBC mode** where the IV was `01020304050607080102030405060708` in **hexadecimal** and the key started off with `harperssecretke`. However. I still cannot decrypt my data below **in hexadecimal format**.

```
375f9ad2bec3c930e5cd4b1d243e2ccf1d7a43f2c88f68cdd65cd01948de242caa6ec30ebea93c86b6deca3b247f7ca7
```

**Can you guess the AES key and decrypt the data?**

**Challenge Files:** msg.txt

**Flag:** CITS1003{tH4nK_g0d_tH3rE_k3y_w45_gUeS5AbLe!}

## Solution

* Since AES-128 was used only 1 byte is missing from the AES key. We could guess this to be `harperssecretkey` since it makes sense which will successfuly decrypt the data and reveal the flag.
