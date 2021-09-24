import pickle
import os.path
import pandas as pd
import sys


df = pd.read_csv('train_datafile.csv')
df.pop('yield')


#Création des données predictives et de la données à prédire
X = df.drop('val', axis = 1).values
target = df['val'].values

print ("Searching for a trained model...")
if os.path.exists("trained_model.pickle"):
    print ("A Trained model already exists!\nDo you want to load it ? (Y/N) : ")
    load=str(input("A Trained model already exists!\nDo you want to load it ? (Y/N) : "))
    if load in ('y','Y'):
        print("Loading Trained Model...\n")
        model = pickle.load(open("trained_model.pickle", "rb"))
        print ("*******************************")
        print("Trained Model Loaded Succesfully!\n")
    elif load in ('n','N'):
        print ("Thank you and GOOD BYE!")
        sys.exit()
    else:
        print ("ERROR: VERIFY YOUR ANSWER!")
        sys.exit()
else:
    print("\nCreating And Training a New Model")
    print("Model Training Started...\n")
    from sklearn.preprocessing import LabelEncoder

    labEncr_X = LabelEncoder()
    X[:, 0] = labEncr_X.fit_transform(X[:, 0])
    X[:, 1] = labEncr_X.fit_transform(X[:, 1])
    X[:, 2] = labEncr_X.fit_transform(X[:, 2])

    from sklearn.model_selection import train_test_split

    X_train, X_test, y_train, y_test = train_test_split(X, target, test_size=0.28, random_state=42,
                                                        stratify=target)

    ############L'étape suivante consiste à créer le classifieur de forêt aléatoire.

    # Nous importons d'abord RandomForestClassifierde scikit-learn.
    from sklearn.ensemble import RandomForestClassifier

    # Initialisation d'un classifieur de forêt aléatoire avec des paramètres par défaut
    model = RandomForestClassifier(random_state=50)

    # Nous adaptons ensuite ce modèle à nos données d’entraînement
    model.fit(X_train, y_train)

    # once the model has been created, save it to a file
    with open("trained_model.pickle", "wb") as file:
        pickle.dump(model, file)

    print("*******************************\n")
    print("Model Training Completed Succesfully!\n")

################################### EVALUATION ###################################


######évaluons son exactitude à partir des données de test.
#évaluons son exactitude à partir des données de test.
test_score = model.score(X, target)

print("Test score: %.2f%%" % (test_score * 100.0))



