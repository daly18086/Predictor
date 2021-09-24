import pickle
import numpy as np
import pandas as pd

Filename= "CSV FILES/predicted_T2.csv"

#Importing the file to apply the trained model on it
df = pd.read_csv('CSV FILES/T2_progress_reports.csv', index_col=False)

#Loading the trained file
model = pickle.load(open("trained_model.pickle", "rb"))

#Putting the prediction result of our dataframe (df) in a variable (result)
result = model.predict(df)

#Inserting the result to a csv file
df["T2"]=result
df.to_csv(Filename,index=False)

print("\n* * * * * * * * * * * * * * * * * * * * * * * * * * * * *")
print("Data added succesfully to the file : ",Filename)
print("* * * * * * * * * * * * * * * * * * * * * * * * * * * * *")

