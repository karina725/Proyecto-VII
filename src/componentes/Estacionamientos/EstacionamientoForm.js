import React, { useState } from 'react';

const EstacionamientoForm = () => {
  const [numeroEspacio, setNumeroEspacio] = useState('');
  const [descripcion, setDescripcion] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ numeroEspacio, descripcion });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Registrar Estacionamiento</h2>
      <label>
        Número de Espacio:
        <input 
          type="text" 
          value={numeroEspacio} 
          onChange={(e) => setNumeroEspacio(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Descripción:
        <input 
          type="text" 
          value={descripcion} 
          onChange={(e) => setDescripcion(e.target.value)} 
        />
      </label>
      <br />
      <button type="submit">Registrar</button>
    </form>
  );
};

export default EstacionamientoForm;
