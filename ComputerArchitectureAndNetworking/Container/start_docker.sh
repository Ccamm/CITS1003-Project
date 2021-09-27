#!/bin/bash

docker build -t architecturenetwork-challenges-2022 . && \
docker run -it -p 2022:2022 --rm --name architecturenetwork-challenges-container architecturenetwork-challenges-2022
