#include<bits/stdc++.h>
using namespace std;

int find(int A[],int size)
{
	int i,val=0,ten=1;
	for (i=0;i<size;i++)
	{
		val=val*10+A[i];
	}
	
	return val;
}

int fun(int A[],int size)
{
	int val=0,i;
	for (i=0;i<size;i++)
	{
		val+=(i+1)*A[i];
	}
	return val;
}

map<int,set<int> >X;

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		X.clear();
		int A[10];
		int ptr=0;
		int N;
		scanf("%d",&N);
		
		while(N)
		{
			int p=N%10;
			N/=10;
			A[ptr]=p;
			ptr++;
		}
		
		sort(A,A+ptr);
		
		int val=find(A,ptr);
		int s=fun(A,ptr);
		X[s].insert(val);
		
		while(next_permutation(A,A+ptr))
		{
			
			int val=find(A,ptr);
			int s=fun(A,ptr);
		//	cout<<val<<" "<<s<<endl;
			X[s].insert(val);
		}
		
		int maxi=0;
		for (map<int,set<int> >::iterator it=X.begin();it!=X.end();it++)
		{
			maxi=max(maxi,(int)X[it->first].size());
		}
		
		printf("%d\n",maxi);
	}
	
}