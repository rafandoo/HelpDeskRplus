from fastapi import FastAPI
import uvicorn
import conn

app = FastAPI()

@app.get("/cep/{cep}")
def cep(cep: str):
    result = conn.searchZipCode(cep)
    resultJson = {}
    if len(result) > 0:
        resultJson = {
            "zip_code": result[0][1],
            "street": result[0][2],
            "complement": result[0][3],
            "neighborhood": result[0][4],
            "city": result[0][5],
            "state": result[0][6]
        }
    else:
        resultJson = {
            "message": "Zip code not found."
        }
    return resultJson

if __name__ == "__main__":
    uvicorn.run(app, host="localhost", port=8000)
