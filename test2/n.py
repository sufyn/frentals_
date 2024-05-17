# import pandas as pd

# # Load the CSV file
# df = pd.read_csv('Myntra.csv')

# # Remove the 'description' and 'url' columns
# df1 = df.drop(['URL','Product_id','BrandName','Category','Individual_category','category_by_Gender','DiscountPrice (in Rs)','OriginalPrice (in Rs)','DiscountOffer','SizeOption','Ratings','Reviews'
# ], axis=1)
# df2 = df.drop(['Product_id','BrandName','Category','Individual_category','category_by_Gender','Description','DiscountPrice (in Rs)','OriginalPrice (in Rs)','DiscountOffer','SizeOption','Ratings','Reviews'
# ], axis=1)

# # Write the DataFrame to two new CSV files
# df1.to_csv('myntra_des.csv', index=False)
# df2.to_csv('myntra_url.csv', index=False)

#add , and " " to each row in myntra_des.csv file

import csv
with open('myntra_des.csv', 'r') as infile, open('myntra_des1.csv', 'w') as outfile:
    reader = csv.reader(infile)
    writer = csv.writer(outfile)
    for row in reader:
        writer.writerow([f'{x},' for x in row])

#add , and " " to each row in myntra_url.csv file

import csv
with open('myntra_url.csv', 'r') as infile, open('myntra_url1.csv', 'w') as outfile:
    reader = csv.reader(infile)
    writer = csv.writer(outfile)
    for row in reader:
        writer.writerow([f'{x},' for x in row])


                     