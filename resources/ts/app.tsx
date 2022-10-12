import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import SignIn from './SignIn';
import { Container, } from "@mui/material";
import { createRoot } from 'react-dom/client';

const App = () => {
    return (
      <Container maxWidth="sm" >
        <SignIn />
      </Container>
    );
};
const root = createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
