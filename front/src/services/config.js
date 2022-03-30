import axios from "axios";
import dotenv from "dotenv";

dotenv.config();

export const http = axios.create({
  baseURL: process.env.VUE_APP_API_SERVER,
});
