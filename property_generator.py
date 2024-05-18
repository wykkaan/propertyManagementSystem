import random
import mysql.connector

# Connect to MySQL database
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="pms"
)

# Retrieve all user IDs with the real estate agent role from the 'users' table
cursor = mydb.cursor()
cursor.execute("SELECT user_id, user_fullname FROM users WHERE user_profile = 'Real Estate Agent'")
agents = cursor.fetchall()

# Retrieve all user IDs with the seller role from the 'users' table
cursor.execute("SELECT user_id, user_fullname FROM users WHERE user_profile = 'Seller'")
sellers = cursor.fetchall()

# Function to generate property names and descriptions
def generate_property():
    locations = ['Hougang', 'Jurong', 'Tampines', 'Ang Mo Kio', 'Bukit Batok', 'Woodlands', 'Bedok', 'Yishun',
                 'Choa Chu Kang', 'Punggol']
    numbers = ['101', '202', '303', '404', '505', '606', '707', '808', '909', '110', '220', '330', '440', '550',
               '660']
    types = ['3-room', '4-room', '5-room', 'Shoebox']
    descriptors = ['Garden', 'Residence', 'Vista', 'Terrace', 'View', 'Palms', 'Heights', 'Meadows', 'Park',
                   'Grove']

    property_type = random.choice(types)
    property_name = f"{random.choice(locations)} {random.choice(numbers)} {random.choice(descriptors)}"
    property_description = property_type

    return property_name, property_description

# Generate 100 properties
for _ in range(100):
    property_name, property_description = generate_property()
    agent_id, agent_name = random.choice(agents)  # Random user ID and name with the real estate agent role
    seller_id, seller_name = random.choice(sellers)  # Random user ID and name with the seller role
    property_price = random.randint(300000, 1000000)  # Random price
    view_count = random.randint(0, 100)  # Random view count
    interest_count = random.randint(0, 50)  # Random interest count

    # Insert property into 'property' table with the agent's ID as seller_id and seller_name as the randomly chosen seller_name
    cursor.execute("INSERT INTO property (seller_id, seller_name, property_name, property_price, property_description) VALUES (%s, %s, %s, %s, %s)",
                   (agent_id, seller_name, property_name, property_price, property_description))
    mydb.commit()

    # Get the last inserted propertylisting_id
    propertylisting_id = cursor.lastrowid

    # Insert property into 'list' table with pending status and tagged to the agent
    cursor.execute(
        "INSERT INTO list (propertylisting_id, list_status, user_id, view_count, interest_count) VALUES (%s, %s, %s, %s, %s)",
        (propertylisting_id, 'PENDING', agent_id, view_count, interest_count))
    mydb.commit()

# Mark 20 properties as sold
cursor.execute("SELECT propertylisting_id FROM list WHERE list_status = 'PENDING' ORDER BY RAND() LIMIT 20")
properties_to_sell = cursor.fetchall()
for property_id in properties_to_sell:
    cursor.execute("UPDATE list SET list_status = 'SOLD' WHERE propertylisting_id = %s", (property_id[0],))
    mydb.commit()

# Close database connection
mydb.close()
