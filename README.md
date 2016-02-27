# gitignore
gitignore cli with autocompletion powered by gitignore.io.

![example screen session](example.gif)

## Setup by installing a .deb

Just download an install the .deb file from the latest [release](https://github.com/schorsch3000/gitignore/releases/)


## Setup Manually

You need to have a php-cli interpreter installed, if you running an apt based distro this will do the job:

``` sh
$ sudo install php5-cli
```


Now you need to get gitignore into you path:

``` sh
$ sudo ln -s gitignore.php /usr/local/bin/gitignore
```

The last step makes sure your shell is able to use autocompletion.

add

``` sh
. ~/path/to/gitignore/autocomplete.sh
```

to your .bashrc or .bash_profile and reload you setting eg. by reopening your terminal.
