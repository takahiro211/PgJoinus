import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import SignIn from './components/SignIn';
import AppBar from './components/AppBar';
import Drawer from './components/Drawer';
import Home from './pages/Home';
import { Container, Box, } from "@mui/material";
import { createRoot } from 'react-dom/client';

const App = () => {
    return (
      <Box>
        <Home />
      </Box>
    );
};
const root = createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
