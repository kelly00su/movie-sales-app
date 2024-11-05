import sqlite3
from datetime import datetime

def main():
    # Connect to the SQLite database
    db_path = "./database/database.sqlite"
    db = sqlite3.connect(db_path)
    date_input = input("Enter date (MM/DD/YYYY): ")
    
    try:
        # Ensure date_input is a string
        date_input = str(date_input)
        date = datetime.strptime(date_input, "%m/%d/%Y").date()
        cursor = db.cursor()
        query = """
            SELECT Theaters.name, SUM(Sales.sales_amount) as total_sales
            FROM Sales
            JOIN Theaters ON Sales.theater_id = Theaters.id
            WHERE Sales.date = ?
            GROUP BY Theaters.name
            ORDER BY total_sales DESC
            LIMIT 1;
        """
        cursor.execute(query, (date,))
        result = cursor.fetchone()
        if result:
            print("Theater with highest sales: {}, Sales: ${:,.2f}".format(result[0], result[1]))
        else:
            print("No data for that date.")
    except ValueError:
        print("Invalid date format! Please enter the date in MM/DD/YYYY format.")
    except sqlite3.Error as e:
        print("Database error: {}".format(e))
    finally:
        db.close()

if __name__ == "__main__":
    main()