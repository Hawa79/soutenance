<div class="mb-3">
    <label>Propriété</label>
    <input type="text" name="propriete" class="form-control" value="{{ old('propriete', $location->propriete ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Client</label>
    <input type="text" name="client" class="form-control" value="{{ old('client', $location->client ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Date de début</label>
    <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $location->date_debut ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Date de fin</label>
    <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $location->date_fin ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Montant (FCFA)</label>
    <input type="number" name="montant" class="form-control" value="{{ old('montant', $location->montant ?? '') }}" required>
</div>
