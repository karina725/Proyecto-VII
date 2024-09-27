import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import LoginForm from "./componentes/LoginForm"; 

function App() {
  return (
    <div className="App">
      <LoginForm />
      <div className="container">
        <h1>Sistema de Gestión de Estacionamientos</h1>
        <UsuarioList />
        <EmpleadoList />
        <EstacionamientoList />
        <ReservaList />
        <LiberacionList />
        <LogList />
      </div>
    </div>
  );
}

export default App;
