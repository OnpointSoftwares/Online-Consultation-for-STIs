from flask import Flask, render_template, request, jsonify
import joblib
import numpy as np
from flask_cors import CORS
app = Flask(__name__)
CORS(app)
# Load the pre-trained model
model = joblib.load('sti_prediction_model.joblib')  # Replace with your actual filename

# Endpoint for predicting STI
@app.route('/predict_sti', methods=['POST'])
def predict_sti():
    try:
        # Get symptoms from the request
        data = request.get_json()
        symptoms = data['symptoms']

        # Convert symptoms to a binary array (0s and 1s)
        symptom_array = np.zeros(len(model.feature_names_in_))
        for symptom in symptoms:
            if symptom in model.feature_names_in_:
                index = model.feature_names_in_.index(symptom)
                symptom_array[index] = 1
                print(symptom)

        # Make prediction
        predicted_sti = model.predict([symptom_array])[0]
        print(predict_sti())
        return jsonify({'predicted_sti': str(predicted_sti)})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

# Serve the HTML page
@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
