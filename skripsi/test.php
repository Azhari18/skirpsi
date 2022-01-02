public function index(){
return view('dashboard.transactions.show', [
'transactions' => Transaction::latest()->get()
]);
}
public function destroy(Transaction $transaction)
{
$debts = Debt::where('transaction_id', $transaction->id)->first();
if ($debts) {
return redirect('/dashboard/transactions')->with('failed', 'Transaksi belum Lunas!');
} else {
Transaction::destroy($transaction->id);
return redirect('/dashboard/transactions')->with('success', 'Data transaksi berhasil dihapus!');
}
}