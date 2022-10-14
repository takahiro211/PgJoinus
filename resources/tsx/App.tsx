import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import SignIn from './pages/SignIn';
import SignUp from './pages/SignUp';
import Terms from './pages/Terms';
import Privacy from './pages/Privacy';
import ForgotPassword from './pages/ForgotPassword';
import Home from './pages/Home';
import { createRoot } from 'react-dom/client';
import { Routes, Route, BrowserRouter } from "react-router-dom";

const App = () => {
    return (
      <React.StrictMode>
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/sign-in" element={<SignIn />} />
            <Route path="/sign-up" element={<SignUp />} />
            <Route path="/terms" element={<Terms />} />
            <Route path="/private" element={<Privacy />} />
            <Route path="/forgot-password" element={<ForgotPassword />} />
          </Routes>
        </BrowserRouter>
      </React.StrictMode>
    );
};
const root = createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
