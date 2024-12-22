Nette Web Project
=================

## Docker and development environment
```bash
mkdir dbdata
chmod -R a+rwx log temp
```

### running docker
```bash
docker compose up -d
```

### styles
To by able to aply css or tailwind styles run next command
**need npm 9.6.7 installed**
```bash
npm run build-css
```
you have to enter this command every time you made a change or just put **Temporally** the next line to the header.latte
`<script src="https://cdn.tailwindcss.com"></script>`

### dev pages
- http://pma.lvh.me/ -> database
- http://pmap.husitetynec/www/ -> page itself

### php in container
```
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
```
