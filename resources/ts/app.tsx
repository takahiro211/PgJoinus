import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import SignIn from './SignIn';
import AppBar from './AppBar';
import Drawer from './Drawer';
import { Container, Box, ThemeProvider, Stack, createTheme, PaletteMode } from "@mui/material";
import { createRoot } from 'react-dom/client';
import Navbar from "./components/NavBar";
import Sidebar from "./components/Sidebar";
import Feed from "./components/Feed";
import Rightbar from "./components/Rightbar";
import Add from "./components/Add";
import { useState } from "react";

const App = () => {
  const [mode, setMode] = useState("light");

  const darkTheme = createTheme({
    palette: {
      mode: mode as PaletteMode,
    },
  });
    return (
      <ThemeProvider theme={darkTheme}>
        <Box bgcolor={"background.default"} color={"text.primary"}>
          <Navbar />
          <Stack direction="row" spacing={2} justifyContent="space-between">
          <Sidebar setMode={setMode} mode={mode}/>
            <Feed />
            <Rightbar />
          </Stack>
          <Add />
        </Box>
      </ThemeProvider>
    );
};
const root = createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
