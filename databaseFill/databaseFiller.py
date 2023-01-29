import mysql.connector
from faker import Faker
import hashlib
import random
import string

password = "qwerty"
phone_numbers = ['9327777785', '4957924867', '9327771667', '4959697918', '9163777135', '4953644789', '4957956692', '9166777106', '9652937293', '9341111123']

def get_random_inn():
    # choose from all lowercase letter
    letters = string.digits
    result_str = ''.join(random.choice(letters) for i in range(12))
    return result_str

fake = Faker('ru_RU')
names = []
email = []
passwords = []
birthdates = []
inns = []
for _ in range(10):
    names.append(fake.last_name_male() + ' ' + fake.first_name_male() + ' ' + fake.middle_name_male())
for _ in range(10):
    email.append(fake.ascii_company_email())
for _ in range(10):
    passwords.append(hashlib.md5(password.encode()).hexdigest())
for _ in range(10):
    birthdates.append(fake.date())
for _ in range(10):
    inns.append(get_random_inn())

try:
    # connection to exist database 
    connection = mysql.connector.connect(
        host='localhost',
        user='root',
        password='root',
        database='insurance_company'
    )

    connection.autocommit = True

    # the cursor for perfoming database operations
    with connection.cursor() as cursor:
        cursor.execute(
            "SELECT VERSION()"
        )

        print(f"Server version: {cursor.fetchone()}")
        
        with connection.cursor() as cursor:
            for i in range(10):
                cursor.execute(
                    f"""INSERT INTO users (full_name, email, password, phone_number, birth_date, inn) 
                    VALUES ('{names[i]}', '{email[i]}', '{passwords[i]}', '{phone_numbers[i]}', '{birthdates[i]}', '{inns[i]}')"""
                )

        print("[INFO] Succesfully inserted")

except Exception as _ex:
    print("[INFO] Error while working with MySql", _ex)
finally:
    if connection: 
        connection.close()
        print("[INFO] MySql connection closed")