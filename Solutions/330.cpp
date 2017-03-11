#include <iostream>
#include <cmath>
#include <algorithm>

#define MOD 1000000007ll

using namespace std;


long long fact[10000001];

int fast_pow(long long base, long long n, long long M)
{
	if (n == 0)
		return 1;
	if (n == 1)
		return base;
	long long halfn = fast_pow(base, n / 2, M);
	if (n % 2 == 0)
		return (halfn * halfn) % M;
	else
		return (((halfn * halfn) % M) * base) % M;
}
int findMMI_fermat(int n, int M)
{
	return fast_pow(n, M - 2, M);
}

long long get_fact(long long n) {
	if (n <= 10000000) {
		return fact[n];
	}
	else {
		long long ans = fact[10000000];
		for (long long i = 10000001; i <= n; i++)
			ans = (ans*i) % MOD;
		return ans;
	}
}


int main() {
	ios::sync_with_stdio(0);
	long long n;
	
	int t;
	int k;
	fact[0] = 1;
	for (int i = 1; i <= 10000000; i++)
		fact[i] = (fact[i - 1] * i) % MOD;
	cin >> t;
	while (t--) {
		cin >> n >> k;
		int levels = (int)log2(k) + 1;
		long long denom = (get_fact(k-1)*get_fact(n - 1 - (k - 1))) % MOD;
		long long mmi = findMMI_fermat(denom,MOD);
		long long numer = get_fact(n - 1);
		long long ans = (numer*mmi) % MOD;
		cout << ans << "\n";
	}
	return 0;
}