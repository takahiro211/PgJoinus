import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import SignIn from './SignIn';
import AppBar from './AppBar';
import Drawer from './Drawer';
import { Container, Box, } from "@mui/material";
import { createRoot } from 'react-dom/client';

const App = () => {
    return (
      <Box>
        <AppBar />
        <Drawer />
        <Container maxWidth="sm" >
          <SignIn />
        </Container>
      </Box>
    );
};
const root = createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
