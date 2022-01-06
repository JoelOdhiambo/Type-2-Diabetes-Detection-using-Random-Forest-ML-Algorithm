import requests
import json

url = 'http://127.0.0.0:5000/prediction'

data = [[14.34, 1.68, 2.7, 25.0, 98.0, 2.8, 1.31, 0.53]]

j_data=json.dumps(data)
headers={'content-type': 'application/json', 'Accept-Charset': 'UTF-8'}
r = requests.post(url, data=j_data, headers=headers)
print(r, r.text)