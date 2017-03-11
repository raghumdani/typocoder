#include"bits/stdc++.h"
using namespace std;

int A[1000005];

int main()
{
	int N,i,j,k;
	scanf("%d",&N);
	long long sum=0;
	
	for(i=1;i<=N;i++)
	{
		scanf("%d",&A[i]);
	}
	sort(A+1,A+N+1);
	
	for(i=1;i<=N;i++)
	{
		sum+=(N-i+1)*A[i];
	}
	printf("%lld",sum);
	return 0;
}