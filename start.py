import threading
from os import system
import sys

def params():
    """
    It gets the parameters passed to the script
    """
    return sys.argv[1:]

def run(cmd):
    """
    It runs a command
    
    :param cmd: The command to run
    """
    system(cmd)

def main(param):
    """
    It takes two parameters, cmd and param.
    
    :param cmd: list of commands to run
    :param param: list of parameters passed to the script
    """
    for prm in param:
        if prm == '-r':
            run('php artisan migrate:fresh')
        if prm == '-m':
            run('php artisan migrate')
        if prm == '-s':
            run('php artisan db:seed')
        if prm == '-ms':
            run('php artisan migrate:fresh --seed')
        if prm == '-run':
            cmd = ['php artisan serve', 'python util\src\main.py']
            threads = []
            for c in cmd:
                t = threading.Thread(target=run, args=(c,))
                threads.append(t)
                t.start()

if __name__ == '__main__':
    param = params()
    if param == ['-help']:
        print('''
        This script runs multiple commands in parallel.
        Usage: python start.py [command]
        
        Parameters:
        -m: Runs the migration command
        -s: Runs the seed command
        -ms: Runs the migration and seed commands
        -r: Resets the database
        -run: Runs the server and the python script
        ''')
        exit()
    main(param)
