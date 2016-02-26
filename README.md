# gitignore
gitignore cli with autocompleteion powered by gitignore.io.

![example screen session](example.gif)

## Setup

You need to have a php-cli interpreter installed, if you running an apt based distro this will do the job:

``` sh
$ sudo install php5-cli
```

or even

``` sh
$ sudo install php7-cli
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
