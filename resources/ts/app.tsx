import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import { createRoot } from 'react-dom/client';
import Button from '@material-ui/core/Button';

const App = () => {
    const title: string = "Laravel 9 Vite with TypeScript React";
    return (
    <><h1>{title}</h1><Button variant="contained" color="primary">
            Hello World
        </Button></>
    );
};
const container = document.getElementById('app') as HTMLInputElement;
const root = createRoot(container);
root.render(<App />);
