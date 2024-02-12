from flask import Flask, render_template, request, jsonify
import joblib
import numpy as np
import pandas as pd
from flask_cors import CORS
app = Flask(__name__)
CORS(app)
# Load the pre-trained model
model = joblib.load('sti_prediction_model.joblib')  # Replace with your actual filename

# Endpoint for predicting STI
model = joblib.load('sti_prediction_model.joblib')  # Replace with your actual filename

# Read the dataset for feature names
df = pd.read_csv('data.csv')  # Replace with the actual filename
feature_names = df.drop('STI_Type', axis=1).columns.tolist()

# Endpoint for predicting STI
@app.route('/predict_sti', methods=['POST'])
def predict_sti():
    try:
        # Get symptoms from the request
        data = request.get_json()
        symptoms = data['symptoms']

        # Prepare data for prediction
        symptom_array = prepare_data(symptoms, feature_names)

        # Make prediction
        predicted_sti = model.predict([symptom_array])[0]
        print(predicted_sti)
        return jsonify({'predicted_sti': str(predicted_sti)})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

def prepare_data(symptoms, feature_names):
    # Convert symptoms to a binary array (0s and 1s)
    symptom_array = np.zeros(len(feature_names))
    for symptom in symptoms:
        if symptom in feature_names:
            index = feature_names.index(symptom)
            symptom_array[index] = 1

    return symptom_array

# Serve the HTML page
@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
