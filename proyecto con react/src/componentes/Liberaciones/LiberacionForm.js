import React, { useState } from 'react';

const LiberacionForm = () => {
  const [empleado, setEmpleado] = useState('');
  const [estacionamiento, setEstacionamiento] = useState('');
  const [fechaLiberacion, setFechaLiberacion] = useState('');
  const [horaLiberacion, setHoraLiberacion] = useState('');
  const [motivo, setMotivo] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ empleado, estacionamiento, fechaLiberacion, horaLiberacion, motivo });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Liberar Estacionamiento</h2>
      <label>
        Empleado:
        <input 
          type="text" 
          value={empleado} 
          onChange={(e) => setEmpleado(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Estacionamiento:
        <input 
          type="text" 
          value={estacionamiento} 
          onChange={(e) => setEstacionamiento(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Fecha de Liberación:
        <input 
          type="date" 
          value={fechaLiberacion} 
          onChange={(e) => setFechaLiberacion(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Hora de Liberación:
        <input 
          type="time" 
          value={horaLiberacion} 
          onChange={(e) => setHoraLiberacion(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Motivo:
        <input 
          type="text" 
          value={motivo} 
          onChange={(e) => setMotivo(e.target.value)} 
        />
      </label>
      <br />
      <button type="submit">Liberar</button>
    </form>
  );
};

export default LiberacionForm;
