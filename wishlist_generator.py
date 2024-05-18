import random
import mysql.connector

# Connect to MySQL database
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="pms"
)

# Retrieve all property IDs from the 'property' table
cursor = mydb.cursor()
cursor.execute("SELECT property_id FROM property")
property_ids = cursor.fetchall()

# Retrieve all user IDs from the 'users' table
cursor.execute("SELECT user_id FROM users")
user_ids = cursor.fetchall()

# Function to generate random wishlist entry
def generate_wishlist_entry():
    property_id = random.choice(property_ids)[0]
    user_id = random.choice(user_ids)[0]
    priority = random.randint(1, 5)  # Random priority level
    note = "Lorem ipsum dolor sit amet, consectetur adipiscing elit."  # Sample note

    return property_id, user_id, priority, note

# Generate 100 wishlist entries
for _ in range(100):
    property_id, user_id, priority, note = generate_wishlist_entry()

    # Insert wishlist entry into 'wishlist' table
    cursor.execute(
        "INSERT INTO wishlist (property_id, user_id, priority, note) VALUES (%s, %s, %s, %s)",
        (property_id, user_id, priority, note)
    )
    mydb.commit()

# Close database connection
mydb.close()
