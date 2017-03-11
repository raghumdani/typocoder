#include <bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int t;
	cin>>t;
	while (t--)
	{
		string b;
		cin>>b;
		int n=b.size();
		int a[n];
		for (int i = 0; i < n; ++i)
		{
			a[i]= b[i]-'0';
			/* code */
		}
		sort(a,a+n);
		long j=0;
		//fact[10]={1,2,6,24,120,720,5040,40320,362880};
		long S[362882], freq[10000]={0};
		do
		{
			S[j]=0;
			for (int i = 0; i < n; ++i)
			{
				S[j]+=(a[i])*(i+1);
				/* code */
			}
			//if (j>=362485) cout<<S[j]<<endl;
			j++;
		}while (next_permutation(a,a+n));
		//cout<<"1"<<endl;
		for (int i = 0; i < j; ++i)
		{
			//cout<<S[i]<<" "<<i<<endl;
			freq[S[i]]++;
			/* code */
		}
		sort(freq, freq+10000);
		cout<<freq[9999]<<endl;;
	}
	return 0;
}