import sqlite3
import glob
import pandas as pd

PATH = 'util\src\db\data.db'

def initDB():
    """
    If the database doesn't exist, create it. If it does exist, do nothing.
    :return: A connection object.
    """
    try:
        conn = sqlite3.connect(PATH)
        cursor = conn.cursor()
        cursor.execute("""
        CREATE TABLE IF NOT EXISTS "zip_codes" (
            "id"	        INTEGER,
            "zip_code"      TEXT,
            "street"	    TEXT,
            "complement"	TEXT,
            "neighborhood"	TEXT,
            "city"	        TEXT,
            "state"	        TEXT,
            PRIMARY KEY("id" AUTOINCREMENT)
        );
        """)
        return conn
    except sqlite3.Error as e:
        print("Error: %s" % e)

def closeConn(conn):
    """
    It closes the connection to the database
    
    :param conn: The connection object
    """
    conn.close()

def importCSV():
    """
    Import the data from the CSV file to the database.
    """
    try:
        allFiles = [f for f in glob.glob('util\src\csv\*.csv')]
        combinedCSV = pd.DataFrame()
        for f in allFiles:
            df = pd.read_csv(f, sep=',', encoding='utf-8')
            df.columns = ['zip_code', 'street', 'complement', 'neighborhood', 'city', 'state']
            combinedCSV = pd.concat([combinedCSV, df])
        
        conn = initDB()
        combinedCSV.to_sql('zip_codes', conn, if_exists='append', index=False)
        conn.commit()
        closeConn(conn)
    except sqlite3.Error as e:
        print("Error: %s" % e)

def searchZipCode(zip_code):
    """
    Search for a zip code in the database.
    
    :param zip_code: The zip code to be searched
    :return: A list of dictionaries containing the zip code data
    """
    try:
        conn = initDB()
        cursor = conn.cursor()
        cursor.execute("""
        SELECT * FROM zip_codes WHERE zip_code = ?
        """, (zip_code,))
        result = cursor.fetchall()
        closeConn(conn)
        return result
    except sqlite3.Error as e:
        print("Error: %s" % e)
        
