import "../js/bootstrap";
import "../css/app.css";
import React from "react";
import { createRoot } from 'react-dom/client';
import { Typography, TextField, Button, CssBaseline, Container, DialogTitle, Dialog } from '@material-ui/core';


type HelloDialogProps = {
    open: boolean;
    name: string;
    onClose: () => void;
  }

function HelloDialog(props: HelloDialogProps) {
    const { open, name, onClose } = props;
  
    return (
      <Dialog onClose={onClose} open={open}>
        <DialogTitle>ご挨拶</DialogTitle>
        <Typography variant="h5">こんにちは、{name}さん！</Typography>
      </Dialog>
    );
  }

const App = () => {
    const title: string = "Laravel 9 Vite with TypeScript React";

    const [open, setOpen] = React.useState(false);
    const [name, setName] = React.useState("");
    const [buttonDisabled, setButtonDisabled] = React.useState(true);

    const handleClickOpen = () => {
        setOpen(true);
      };
    
    const handleClose = () => {
        setOpen(false);
    };

    const handleNameChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        setName(value);
        setButtonDisabled(!Boolean(value));
      }

    return (
    <>        
        <Container maxWidth="sm" >
        <CssBaseline />
        <h1>{title}</h1>
        <Button
            variant="contained"
            color="primary" >
            Hello World
        </Button>
        <h2>ようこそ</h2>
        <form>
            <TextField
            label="名前"
            name="name"
            variant="outlined"
            size="small"
            fullWidth
            margin="normal"
            onChange={handleNameChange} />
            <Button
            variant="contained"
            color="primary"
            fullWidth
            disabled={buttonDisabled}
            onClick={handleClickOpen} >
            Click!
            </Button>
            <HelloDialog open={open} name={name} onClose={handleClose} />
        </form>
        </Container>
    </>
    );
};
const container = document.getElementById('app') as HTMLInputElement;
const root = createRoot(container);
root.render(<App />);
