from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
import uvicorn
import conn

app = FastAPI()

origins = ["*"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.get("/zipcode/{zip}")
async def zip_code(zip: str):
    result = conn.searchZipCode(zip)
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
    uvicorn.run(app, host="localhost", port=8080)
