<div class="modal" id="modal-form">
  <div class="modal-background"></div>
  <div class="modal-content">
      <div class="box">
      	<form action="{{ route('transaction.store') }}" id="form_transaction" method="POST" enctype="multipart/form-data">
			@csrf @method('POST')
			<div class="field">
				<label class="label" for="type">Income/Expense</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
					<select name="type_id" id="type" data-url="{{ route('json.getdata') }}" required>
						@if ($types)
							<option value="">Choose...</option>
							@foreach ($types as $type)
								<option value="{{ $type->id }}">{{ $type->name }}</option>
							@endforeach
							
						@endif
					</select>
					</div>
				</div>
			</div>
			<div class="field">
				<label class="label" for="category">Category</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
					<select name="category_id" id="category" data-url="{{ route('json.getdata') }}" required>
					</select>
					</div>
				</div>
			</div>
			<div class="field">
				<label class="label" for="subcategory">Subcategory</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
					<select name="subcategory_id" id="subcategory" required>
					</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label" for="amount">Amount</label>
				<div class="control">
					<input class="input" type="number" name="amount" id="amount" placeholder="9999.00" step="0.01" required>
				</div>
			</div>
			<div class="field">
				<label class="label" for="about">About</label>
				<div class="control">
					<textarea class="textarea" name="about" id="about" rows="2" maxlength="140" placeholder="Write something..."></textarea>
				</div>
			</div>

			<button class="button is-link" id="submit-form">Save</button>
			<button class="button is-link is-light" id="close-modal">Cancel</button>
      	</form>
      </div>
  	</div>
  <button class="modal-close is-large" aria-label="close" id="modal-close"></button>
</div>