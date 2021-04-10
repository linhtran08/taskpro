ssh -f -X receiver@$(docker inspect --format '{{ .NetworkSettings.IPAddress }}' citrix) -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no /usr/bin/firefox "https://sslvpn.cyberlogitec.com/vpn/index" > /dev/null 2>&1

