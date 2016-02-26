#!/bin/bash

_gitignore()
{
    COMPREPLY=()
    CMD="gitignore _AC_ ${COMP_CWORD}"

    for i in ${COMP_WORDS[@]}; do
        CMD="${CMD} ${i}"
    done
       RETURN=$(${CMD})
        eval ${RETURN}
        return 0

}
complete -F _gitignore gitignore
