import React, { useState } from 'react';

const UsuarioForm = () => {
  const [nombre, setNombre] = useState('');
  const [email, setEmail] = useState('');
  const [contraseña, setContraseña] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ nombre, email, contraseña });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Registrar Usuario</h2>
      <label>
        Nombre:
        <input 
          type="text" 
          value={nombre} 
          onChange={(e) => setNombre(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Email:
        <input 
          type="email" 
          value={email} 
          onChange={(e) => setEmail(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Contraseña:
        <input 
          type="password" 
          value={contraseña} 
          onChange={(e) => setContraseña(e.target.value)} 
          required 
        />
      </label>
      <br />
      <button type="submit">Registrar</button>
    </form>
  );
};

export default UsuarioForm;
