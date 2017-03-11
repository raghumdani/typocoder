#include <bits/stdc++.h>
#define F first
#define S second
using namespace std;
#define mod 1000000007
pair<pair<int,int>,int> qr[1000005];
int BS;
int ANS=1;
int count1[1000004];
long long int ans[1000005];
int a[1000005];


long long int modpow(long long int base,long long int expo){
	long long xx = 1;
	while(expo>0){
		if(expo&1){
			xx = (xx*base)%mod;
		}
		base = (base*base)%mod;
		expo = expo>>1;
	}
	return xx;
}

inline void remove(int x)
{
	if(count1[x] == 1){
		//cout<<x<<" X :: "<<ANS<<endl;
		//long long modinv = modpow(x,mod-2);
		//cout<< modinv ;
		ANS = ((ANS%mod)*(modpow(x, mod-2)%mod))%mod;
		//cout<<x<<" X :: "<<ANS<<endl;
	}
	count1[x]--;
}

inline void add(int x)
{
	if(count1[x] == 0){
		ANS = ((ANS%mod)*(x%mod))%mod;
	}
	count1[x]++;
}

inline bool comp(const pair<pair<int,int>,int> &x,const pair<pair<int,int>,int> &y)
{
	int blockx=x.F.F/BS;
	int blocky=y.F.F/BS;
	if(blockx!=blocky)
		return blockx<blocky;
	return x.F.S<y.F.S;
}

int main()
{
	int n,q;
	for(int i=0;i<1000004;i++)
		count1[i]=0;
	scanf("%d",&n);
	for(int i=0;i<n;i++)
	{
		scanf("%d",&a[i]);
	}
	
	BS=1001;
	scanf("%d",&q);
	for(int i=0;i<q;i++)
	{
		int l,r;
		scanf("%d %d",&l,&r);
		l--,r--;
		qr[i].F.F=l;
		qr[i].F.S=r;
		qr[i].S=i;
	}

	sort(qr,qr+q,comp);

	int left=0;
	int right=-1;

	for(int i=0;i<q;i++)
	{
		int L=qr[i].F.F;
		int R=qr[i].F.S;
		//cout<<L<<" :: "<<R<<endl;
		while(left<L)
		{
			remove(a[left]);
			left++;
		}

		while(left>L)
		{
			left--;
			add(a[left]);
			
		}

		while(right<R)
		{
			right++;
			add(a[right]);
			
		}

		while(right>R)
		{
			remove(a[right]);
			right--;
		}

		ans[qr[i].S]=ANS;

	}

	for(int i=0;i<q;i++)
	{
		printf("%lld\n",ans[i]);
	}

	return 0;
}