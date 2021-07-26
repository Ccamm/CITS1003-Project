FROM debian:buster-slim

RUN apt-get update && apt-get install -y sudo supervisor nginx lsb-release curl wget openssh-server vim
# Add repos
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

# Install PHP dependencies
RUN apt update && apt install -y php7.4-fpm
COPY config/fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/sshd_config /etc/ssh/sshd_config
RUN mkdir -p /var/run/sshd

RUN useradd -m -s /bin/bash -p '$6$cQ5B4GV6pHyaIqqc$Bh9kuGccthLO5IhNA2ILGDeM4VqT.qR4UdohAeTt1Gxyu0r4DtvIRzaaD6OmqbB0RCIipHtRz4n05O6tAYnIa/' student
RUN useradd -m -G staff -s /bin/bash -p '$6$lWfbDYkq3dNGbG8l$/aAWF7hzPBMK2z7wJ4IG.lU7NfNQ1Rhn7e7LAPiu4zjtFWYCBhquQN19/0XFWP2yqfGvI6/.ImQcE9gkZ3kwe/' jeff
RUN useradd -m -G staff -s /bin/bash -p '$6$oMm1ZjxMg03gGMqT$yCPv5GgqKdlMHjQs//f984tGLjI6ac39/l.ERBCV5z3L3uk1WBthZZjd1.4jeVKaul7K82fdEjlcPqiSiJovW.' alex
RUN useradd -m -G staff david

# Setup flag 1
COPY flags/flag1.txt /home/student/flag1.txt
RUN chown student:student /home/student/flag1.txt && chmod 400 /home/student/flag1.txt

# Setup flag 2
COPY messages/read_me_jeff.txt /home/jeff/read_me_jeff.txt
RUN chown alex:alex /home/jeff/read_me_jeff.txt && chmod 444 /home/jeff/read_me_jeff.txt && \
      mkdir -p /usr/share/python/.supersecretfolder/.hiddenfoldersaresosecure && \
      echo 'Username: jeff' > /usr/share/python/.supersecretfolder/.hiddenfoldersaresosecure/jeffs_creds.txt && \
      echo 'Password: mahnam31sj33ff' >> /usr/share/python/.supersecretfolder/.hiddenfoldersaresosecure/jeffs_creds.txt

COPY flags/flag2.txt /home/jeff/flag2.txt
RUN chown jeff:jeff /home/jeff/flag2.txt && chmod 400 /home/jeff/flag2.txt

# Setup flag 3
COPY other_files/passmanager.php /var/www/html/index.php

RUN chown www-data:www-data /var/www/html/index.php && \
      chmod 400 /var/www/html/index.php
COPY messages/note_to_alex.txt /home/alex/note_to_alex.txt
RUN chown alex:staff /home/alex/note_to_alex.txt && chmod 440 /home/alex/note_to_alex.txt

COPY flags/flag3.txt /home/alex/flag3.txt
RUN chown alex:alex /home/alex/flag3.txt && chmod 400 /home/alex/flag3.txt

USER alex
RUN mkdir /home/alex/topsecret && \
      chmod 770 /home/alex/topsecret
COPY other_files/david_id_rsa /home/alex/topsecret/david_id_rsa
USER root
RUN chown alex:alex /home/alex/topsecret/david_id_rsa && chmod 400 /home/alex/topsecret/david_id_rsa

# Setup flag 4
USER david
RUN mkdir /home/david/.ssh && chmod 770 /home/david/.ssh && \
      echo 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQC6Up/7MvTnc1PgIp7IP/nuvXs8CbdFpQgf/A0dbZIH1ezmb03z+nRrGeNuth+G8/WtzuTvyq5gSdlyU84k3Hh0AwWnhVIHVkYRyb5BKWjuWzfXiWpIRk4xNvHE5TNHK2gBJm2wBzv1liZ91oUwTJKmjpxlCblIz358egS2nOUc5qTpY1aPru263e/r/GfcZ+kpx7qpje/i9UB8ll52D2FZ2VoW0s91KR/RK/X4MdUnRaVZFulE76Z+Ms3FU4Bez5XGRVpVA9fjTQgxQzFobZgb8QeAgHccItl4SOX3Lp7XRyBxBkzpkgbhW2zjm3b0/kLGd9hjMsJT9nyb6ca6u/b9b/1QEWAIKlB0w1S+4dGDJOmjPlqXMyeL4/l375Hxjtbi9wFjLMRaV69RlztGt2CmFdKQArjqhWbGfy8hsQfs2A8hMyNSogZIVGda0G0HAPr9GKrCZ6NT/1qYHe8bltG1lXcDz1sRtw5fG6p+rfitqOfS/gNiDzURV3venGgCy2s= david@cybernemosyne.xyz' >> /home/david/.ssh/authorized_keys
USER root
COPY flags/flag4.txt /home/david/flag4.txt
RUN chown david:david /home/david/flag4.txt && chmod 400 /home/david/flag4.txt

RUN echo "david ALL=(ALL) NOPASSWD: /usr/bin/vim" >>  /etc/sudoers.d/david
COPY flags/flag5.txt /root/flag5.txt
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
