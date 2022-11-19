import threading
from os import system

CMD = ['php artisan serve', 'python util\src\main.py']

def run(cmd):
    """
    It runs a command
    
    :param cmd: The command to run
    """
    system(cmd)

def main(cmd):
    """
    It creates a list of threads, each thread running a command in the list of commands
    """
    threads = []
    for c in cmd:
        t = threading.Thread(target=run, args=(c,))
        threads.append(t)
        t.start()

if __name__ == '__main__':
    main(CMD)
