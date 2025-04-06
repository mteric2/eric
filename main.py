import requests

def obtener_datos_ds_k1t671():
    url = "http://192.168.68.172/api/endpoint"  # Reemplaza con la dirección IP real del terminal y el endpoint adecuado
    headers = {"Authorization": "Bearer TU_TOKEN"}  # Reemplaza con tu token de autenticación (si es necesario)

    try:
        response = requests.get(url, headers=headers)
        if response.status_code == 200:
            datos = response.json()
            # Procesa los datos según tus necesidades
            print(datos)
        else:
            print(f"Error al obtener datos (código {response.status_code}): {response.text}")
    except Exception as e:
        print(f"Error de conexión: {e}")

if __name__ == "__main__":
    obtener_datos_ds_k1t671()
