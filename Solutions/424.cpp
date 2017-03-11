#include"bits/stdc++.h"
using namespace std;
typedef long long ll;



int main()
{
	int T,i,j,k;
	ll N;
	scanf("%d",&T);
	while(T--)
	{
		scanf("%lld",&N);
		vector <int> V;
		while(N!=0)
		{
			V.push_back(N%10);
			N/=10;
		}
		reverse(V.begin(),V.end());
		sort(V.begin(),V.end());
		map<int,int> M;
		while(next_permutation(V.begin(),V.end()))
		{
			int s=0;
			for(i=0;i<V.size();i++)
			{
				s+=(i+1)*(V[i]);
			}
			
			M[s]++;
		}
		map<int,int> :: iterator it=M.begin();
		int maxi=1;
		for(it=M.begin();it!=M.end();++it)
		{
			maxi=max(maxi,it->second);
		}
		printf("%d\n",maxi);
	}
	return 0;
}