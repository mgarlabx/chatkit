from fastapi import FastAPI
from openai import OpenAI
import os
from dotenv import load_dotenv
import uvicorn
from fastapi.middleware.cors import CORSMiddleware

load_dotenv()

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

client = OpenAI(api_key=os.environ["OPENAI_API_KEY"])

@app.post("/api/chatkit/session")
def create_chatkit_session():
    session = client.beta.chatkit.sessions.create(
        user=os.environ["USER_ID"],
        workflow={
            "id": os.environ["CHATKIT_WORKFLOW_ID"]
        },
    )
    return { "client_secret": session.client_secret }

if __name__ == "__main__":

    uvicorn.run(app, host="0.0.0.0", port=8000)
